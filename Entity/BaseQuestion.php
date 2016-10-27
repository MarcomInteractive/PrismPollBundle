<?php

namespace Prism\PollBundle\Entity;

use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * Prism\PollBundle\Entity\BasePoll
 */
abstract class BaseQuestion
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
     * @var \Prism\PollBundle\Entity\BaseOpinion
     */
    protected $opinions;

    /**
     * @var integer $questionVotes
     */
    protected $questionVotes;

    /**
     * @var integer $questionScore
     */
    protected $questionScore;

    /**
     * __construct()
     */
    public function __construct()
    {
        $this->opinions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add opinions
     *
     * @param \Prism\PollBundle\Entity\BaseOpinion $opinions
     *
     * @return BasePoll
     */
    public function addOpinion(\Prism\PollBundle\Entity\BaseOpinion $opinions)
    {
        $opinions->setPoll($this);
        $this->opinions[] = $opinions;

        return $this;
    }

    /**
     * Remove opinions
     *
     * @param \Prism\PollBundle\Entity\BaseOpinion $opinions
     */
    public function removeOpinion(\Prism\PollBundle\Entity\BaseOpinion $opinions)
    {
        $this->opinions->removeElement($opinions);
    }

    /**
     * Get opinions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOpinions()
    {
        return $this->opinions;
    }

    /**
     * Set opinions
     *
     * @param \Doctrine\Common\Collections\Collection $opinions
     */
    public function setOpinions(\Doctrine\Common\Collections\Collection $opinions)
    {
        foreach ($opinions as $opinion) {
            $opinion->setPoll($this);
        }

        $this->opinions = $opinions;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->id && $this->name) {
            return $this->name;
        }

        return 'New Question';
    }

    /**
     * Get the total number of votes
     *
     * @return int
     */
    public function getQuestionVotes()
    {
        if ($this->questionVotes) {
            return $this->questionVotes;
        }

        $this->questionVotes = 0;

        foreach ($this->opinions as $opinion) {
            $this->questionVotes += $opinion->getVotes();
        }

        return $this->questionVotes;
    }

    /**
     * Get the total number of votes
     *
     * @return int
     */
    public function getQuestionScore()
    {
        if ($this->questionScore) {
            return $this->questionScore;
        }

        $this->questionScore = 0;

        foreach ($this->opinions as $opinion) {
            $this->questionScore += $opinion->getScore();
        }

        return $this->questionScore;
    }
}
