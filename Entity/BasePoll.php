<?php

namespace Prism\PollBundle\Entity;

use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Sluggable\Sluggable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Prism\PollBundle\Entity\BasePoll
 */
abstract class BasePoll
{
    use Sluggable, Timestampable;
    
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var boolean $published
     */
    protected $published;

    /**
     * @var boolean $closed
     */
    protected $closed;

    /**
     * @var ArrayCollection
     */
    protected $questions;

    /**
     * @var integer $pollVotes
     */
    protected $pollVotes;

    /**
     * @var integer $pollScore
     */
    protected $pollScore;

    /**
     * __construct()
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * KnpDoctrineBehaviors Sluggable
     *
     * @return array
     */
    public function getSluggableFields()
    {
        return ['name'];
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
     * Set name
     *
     * @param string $name
     *
     * @return BasePoll
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return BasePoll
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set closed
     *
     * @param boolean $closed
     *
     * @return BasePoll
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Get closed
     *
     * @return boolean 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set pollVotes
     *
     * @param integer $pollVotes
     *
     * @return BasePoll
     */
    public function setPollVotes($pollVotes)
    {
        $this->pollVotes = $pollVotes;

        return $this;
    }

    /**
     * Get pollVotes
     *
     * @return integer 
     */
    public function getPollVotes()
    {
        return $this->pollVotes;
    }

    /**
     * Set pollScore
     *
     * @param integer $pollScore
     *
     * @return BasePoll
     */
    public function setPollScore($pollScore)
    {
        $this->pollScore = $pollScore;

        return $this;
    }

    /**
     * Get pollScore
     *
     * @return integer 
     */
    public function getPollScore()
    {
        return $this->pollScore;
    }

    /**
     * Add questions
     *
     * @param \Prism\PollBundle\Entity\BaseQuestion $questions
     *
     * @return BasePoll
     */
    public function addQuestion(\Prism\PollBundle\Entity\BaseQuestion $questions)
    {
        $questions->setPoll($this);
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Prism\PollBundle\Entity\BaseQuestion $questions
     */
    public function removeQuestion(\Prism\PollBundle\Entity\BaseQuestion $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set questions
     *
     * @param \Doctrine\Common\Collections\Collection $questions
     */
    public function setQuestions(\Doctrine\Common\Collections\Collection $questions)
    {
        foreach ($questions as $question) {
            $question->setPoll($this);
        }

        $this->questions = $questions;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->id && $this->name) {
            return $this->name;
        }

        return 'New Poll';
    }
}
