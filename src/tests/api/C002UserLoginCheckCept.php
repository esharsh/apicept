<?php 
class C002UserLoginCheckCept
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        // $I = new ApiTester($scenario);

        $I->wantTo('Test User Login');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('login', 
                        ['email' => 'davert4@codeception.com',
                        'password' => "abc123"
                    ]);

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->seeResponseContainsJson(['success'=>true]);
    }
}