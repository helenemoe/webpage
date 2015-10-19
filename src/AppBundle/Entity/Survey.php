<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="survey")
 */
class Survey
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Semester")
     */
    protected $semester;

    /**
     * @ORM\ManyToOne(targetEntity="SurveySchema")
     * @ORM\JoinColumn(name="schema_id", referencedColumnName="id")
     */
    protected $surveySchema; // Bidirectional, may turn out to be unidirectional

    /**
     * @ORM\OneToMany(targetEntity="SurveyQuestion", mappedBy="survey", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $surveyQuestions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->surveyQuestions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set surveySchema
     *
     * @param \AppBundle\Entity\SurveySchema $surveySchema
     * @return Survey
     */
    public function setSurveySchema(\AppBundle\Entity\SurveySchema $surveySchema = null)
    {
        $this->surveySchema = $surveySchema;

        return $this;
    }

    /**
     * Get surveySchema
     *
     * @return \AppBundle\Entity\SurveySchema
     */
    public function getSurveySchema()
    {
        return $this->surveySchema;
    }

    /**
     * Add surveyAnswers
     *
     * @param \AppBundle\Entity\SurveyAnswer $surveyAnswers
     * @return Survey
     */
    public function addSurveyAnswer(\AppBundle\Entity\SurveyAnswer $surveyAnswers)
    {
        $this->surveyAnswers[] = $surveyAnswers;

        return $this;
    }

    /**
     * Remove surveyAnswers
     *
     * @param \AppBundle\Entity\SurveyAnswer $surveyAnswers
     */
    public function removeSurveyAnswer(\AppBundle\Entity\SurveyAnswer $surveyAnswers)
    {
        $this->surveyAnswers->removeElement($surveyAnswers);
    }

    /**
     * Get surveyAnswers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSurveyAnswers()
    {
        return $this->surveyAnswers;
    }
}
