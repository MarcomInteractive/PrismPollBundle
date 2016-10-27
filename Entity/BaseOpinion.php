<?php

namespace Prism\PollBundle\Entity;

use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * Prism\PollBundle\Entity\BaseOpinion
 */
abstract class BaseOpinion
{
    use Timestampable;
    
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var integer $votes
     */
    protected $votes;

    /**
     * @var integer $votes
     */
    protected $points;

    /**
     * @var integer $score
     */
    protected $score;

    /**
     * @var integer $ordering
     */
    protected $ordering;

    /**
     * @var \Prism\PollBundle\Entity\BasePoll
     */
    protected $poll;

    /**
     * @var float $votesPercentage
     */
    protected $votesPercentage;

    /**
     * @var boolean $absent
     */
    protected $absent;


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
     * @return $this
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
     * Set votes
     *
     * @param integer $votes
     *
     * @return BaseOpinion
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get votes
     *
     * @return integer 
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return BaseOpinion
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return BaseOpinion
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set ordering
     *
     * @param integer $ordering
     *
     * @return BaseOpinion
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return integer 
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set poll
     *
     * @param \Prism\PollBundle\Entity\BasePoll $poll
     */
    public function setPoll(\Prism\PollBundle\Entity\BasePoll $poll)
    {
        $this->poll = $poll;
    }

    /**
     * Get poll
     *
     * @return \Prism\PollBundle\Entity\BasePoll
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * Set absent
     *
     * @param boolean $absent
     *
     * @return BaseOpinion
     */
    public function setAbsent($absent)
    {
        $this->absent = $absent;

        return $this;
    }

    /**
     * Get absent
     *
     * @return boolean 
     */
    public function getAbsent()
    {
        return $this->absent;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->id) {
            return $this->name;
        }

        return 'New Choice';
    }

    /**
     * Get the votes percentage
     *
     * @return float
     */
    public function getVotesPercentage()
    {
        if ($this->votesPercentage) {
            return $this->votesPercentage;
        }

        if ($this->poll->getTotalVotes() > 0) {
            return $this->votesPercentage = round($this->votes / $this->poll->getTotalVotes() * 100);
        }

        return 0;
    }
}
