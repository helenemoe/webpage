<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Application;
use AppBundle\Entity\Interview;
use AppBundle\Entity\InterviewAnswer;
use AppBundle\Entity\InterviewPractical;
use AppBundle\Entity\InterviewSchema;
use AppBundle\Entity\InterviewScore;
use AppBundle\Entity\User;

class InterviewEntityUnitTest extends \PHPUnit_Framework_TestCase
{

    public function testSetInterviewSchema()
    {

        $interview = new Interview();
        $intSchema = new InterviewSchema();

        $interview->setInterviewSchema($intSchema);

        $this->assertEquals($intSchema, $interview->getInterviewSchema());

    }

    public function testSetInterviewer()
    {

        $interview = new Interview();
        $interviewer = new User();

        $interview->setInterviewer($interviewer);

        $this->assertEquals($interviewer, $interview->getInterviewer());

    }

    public function testSetApplication()
    {

        $interview = new Interview();
        $application = new Application();

        $interview->setApplication($application);

        $this->assertEquals($application, $interview->getApplication());

    }

    public function testAddInterviewAnswer()
    {

        $interview = new Interview();
        $answer = new InterviewAnswer();

        $interview->addInterviewAnswer($answer);

        $this->assertContainsOnly($answer, $interview->getInterviewAnswers());

    }

    public function testRemoveInterviewAnswer()
    {

        $interview = new Interview();
        $answer = new InterviewAnswer();

        $interview->addInterviewAnswer($answer);

        $this->assertContains($answer, $interview->getInterviewAnswers());

        $interview->removeInterviewAnswer($answer);

        $this->assertNotContains($answer, $interview->getInterviewAnswers());

    }

    public function testSetInterviewScore()
    {

        $interview = new Interview();
        $intScore = new InterviewScore();

        $interview->setInterviewScore($intScore);

        $this->assertEquals($intScore, $interview->getInterviewScore());

    }

    public function testSetInterviewed()
    {

        $interview = new Interview();

        $interview->setInterviewed(true);

        $this->assertTrue($interview->getInterviewed());

    }

    public function testSetInterviewPractical()
    {

        $interview = new Interview();
        $intPrac = new InterviewPractical();

        $interview->setInterviewPractical($intPrac);

        $this->assertEquals($intPrac, $interview->getInterviewPractical());

    }

    public function testSetScheduled()
    {

        $interview = new Interview();
        $date = new \DateTime();

        $interview->setScheduled($date);

        $this->assertEquals($date, $interview->getScheduled());

    }

    public function testSetConducted()
    {

        $interview = new Interview();
        $date = new \DateTime();

        $interview->setConducted($date);

        $this->assertEquals($date, $interview->getConducted());

    }
}