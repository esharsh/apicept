<?php
class C001CreateUserCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amHttpAuthenticated('service_user', '123456');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('/sign-up', [
          'first_name' => 'davert', 
          'last_name' => 'davert', 
          'email' => 'davert4@codeception.com',
          'password' => "abc123"
        ]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(["result"=>"ok"]);
    }
}
