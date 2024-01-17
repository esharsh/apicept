<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use _generated\ApiTesterActions;

    /**
     * Define custom actions here
     */

     private $userToken = null;

   public function getUserToken()
   {
      if ($this->userToken) {
         return $this->userToken;
      }
      $this->generateUserToken();
      return $this->userToken;
   }

private function generateUserToken()
{

    $email = 'testUser@test.com';
    $password = '123456789';
    $I = $this;
    $encoder = new BCryptPasswordEncoder(12);
    $I->haveInDatabase('users', [
        'email' => $email,
        'status' => UserConstants::USER_STATUS_VERIFIED,
        'password' => $encoder->encodePassword($password, 'dasdsa'), // salt is not important for Bcrypt
        'created_at' => '2019-01-01 20:20:20',
        'updated_at' => '2019-01-01 20:20:20',
    ]);

    $userId = $I->grabFromDatabase('users', 'id', [
        'email' => $email
    ]);

    $I->haveHttpHeader('Content-Type', 'application/json');
    $I->sendPOST('/api/v1/auth/login', ['username' => $email, 'password' => $password]);
    $response = $I->grabResponse();
    $responseArray = json_decode($response, true);
    $this->userToken = $responseArray['token'];

 }

}