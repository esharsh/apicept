<?php
class C005DeleteUserByTokenCest
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
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendDelete('me', 
        json_decode($this->token, true));
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(["result"=>"ok"]);
    }
}
