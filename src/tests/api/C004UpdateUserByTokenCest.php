<?php
class C004UpdateUserByTokenCest
{
    protected $token;
    public function _before(ApiTester $I)
    {
        $I->wantTo('Test User Login');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $this->token = $I->sendPOST('login', 
                        ['email' => 'davert4@codeception.com',
                        'password' => "abc123"
                    ]);
        $I->wantTo($this->token);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->seeResponseContainsJson(['success'=>true]);
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        // $I->wantTo("".json_decode($this->token, true));
        $temp_token = json_decode($this->token, true);
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPatch('/me', [
            'token' => $temp_token['token'],
            'first_name' => 'davert12345', 
            'last_name' => 'davert', 
            'password' => "abc123"
        ]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(["result"=>"ok"]);
    }
}
