<?php

use yii\helpers\Url;

class ReportCest
{
    public function _before(AcceptanceTester $I)
    {
        //$I->amOnPage('/index.php?r=stats-report%2Findex'); // так работает
         $I->amOnPage(Url::toRoute('stats-report/index'));  // а вот так не хочет, зараза
    }
    
    public function reportPageWorks(AcceptanceTester $I)
    {
        $I->wantTo('ensure that Tasks Report page works');
        $I->see('Отчёты', 'h1');
    }

    /*public function contactFormCanBeSubmitted(AcceptanceTester $I)
    {
        $I->amGoingTo('submit contact form with correct data');
        $I->fillField('#contactform-name', 'tester');
        $I->fillField('#contactform-email', 'tester@example.com');
        $I->fillField('#contactform-subject', 'test subject');
        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');

        $I->click('contact-button');
        
        $I->wait(2); // wait for button to be clicked

        $I->dontSeeElement('#contact-form');
        $I->see('Thank you for contacting us. We will respond to you as soon as possible.');
    }*/
}