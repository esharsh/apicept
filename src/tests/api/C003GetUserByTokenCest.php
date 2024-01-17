<?php
class C003GetUserByTokenCest
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
        // $I->wantTo($this->token);
        $I->haveHttpHeader('Content-Type', 'application/json');
        // $I->sendGet('me', 
        //         ['token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIiwianRpIjoidjEifQ.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImV4cCI6MTcwMDA3MTcwMiwiaWF0IjoxNjk5NDY2OTAyLCJhdWQiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImp0aSI6InYxIiwiaWQiOjI0LCJ1c2VyIjp7ImlkIjoyNCwiZmlyc3RfbmFtZSI6IkhhcnNoIiwibGFzdF9uYW1lIjoiUGF3YXIiLCJlbWFpbCI6ImhhcnNoQGdtYWlsLmNvbSIsInBhc3N3b3JkIjoiYWJjMTIzIiwiY3JlYXRlZF9hdCI6MTY5OTMzNzk5NzE3NywidXBkYXRlZF9hdCI6MTY5OTMzNzk5NzE3N319.'
        //     ]);
        $I->sendGet('me', json_decode($this->token, true));
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(["result"=>"ok"]);
    }
}
