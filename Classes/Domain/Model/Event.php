<?php

namespace JWeiland\Events2\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use JWeiland\Events2\Utility\DateTimeUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Event extends AbstractEntity
{
    /**
     * EventType.
     *
     * @var string
     */
    protected $eventType = 'single';
    
    /**
     * Hidden.
     *
     * @var bool
     */
    protected $hidden = false;
    
    /**
     * TopOfList.
     *
     * @var bool
     */
    protected $topOfList = false;
    
    /**
     * Title.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * Event begin.
     *
     * @var \DateTime
     * @validate NotEmpty
     */
    protected $eventBegin;

    /**
     * EventTime.
     *
     * @var \JWeiland\Events2\Domain\Model\Time
     * @validate NotEmpty
     */
    protected $eventTime;

    /**
     * Event end.
     *
     * @var \DateTime
     */
    protected $eventEnd;

    /**
     * Same day.
     *
     * @var bool
     */
    protected $sameDay = false;

    /**
     * MultipleTimes.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Events2\Domain\Model\Time>
     * @lazy
     */
    protected $multipleTimes;

    /**
     * xTh.
     *
     * @var int
     */
    protected $xth = 0;

    /**
     * Weekday.
     *
     * @var int
     */
    protected $weekday = 0;

    /**
     * differentTimes.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Events2\Domain\Model\Time>
     * @lazy
     */
    protected $differentTimes;

    /**
     * Each weeks.
     *
     * @var int
     */
    protected $eachWeeks = 0;
    
    /**
     * RecurringEnd.
     *
     * @var \DateTime
     */
    protected $recurringEnd;
    
    /**
     * Exceptions.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Events2\Domain\Model\Exception>
     * @lazy
     */
    protected $exceptions;
    
    /**
     * Teaser.
     *
     * @var string
     */
    protected $teaser = '';
    
    /**
     * Detail informations.
     *
     * @var string
     */
    protected $detailInformations = '';

    /**
     * free entry.
     *
     * @var bool
     */
    protected $freeEntry = false;

    /**
     * Ticket link.
     *
     * @var \JWeiland\Events2\Domain\Model\Link
     * @lazy
     */
    protected $ticketLink;

    /**
     * Categories.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @validate NotEmpty
     * @lazy
     */
    protected $categories;

    /**
     * Days.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Events2\Domain\Model\Day>
     * @lazy
     */
    protected $days;

    /**
     * Location.
     *
     * @var \JWeiland\Events2\Domain\Model\Location
     * @validate NotEmpty
     * @lazy
     */
    protected $location;

    /**
     * Organizer.
     *
     * @var \JWeiland\Events2\Domain\Model\Organizer
     * @validate NotEmpty
     * @lazy
     */
    protected $organizer;

    /**
     * Images.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @lazy
     */
    protected $images;

    /**
     * VideoLink.
     *
     * @var \JWeiland\Events2\Domain\Model\Link
     * @cascade remove
     * @lazy
     */
    protected $videoLink;

    /**
     * VideoLink.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Events2\Domain\Model\Link>
     * @cascade remove
     * @lazy
     */
    protected $downloadLinks;

    /**
     * Facebook.
     *
     * @var bool
     */
    protected $facebook = false;

    /**
     * ReleaseDate.
     *
     * @var \DateTime
     */
    protected $releaseDate;

    /**
     * SocialTeaser.
     *
     * @var string
     */
    protected $socialTeaser = '';

    /**
     * facebookChannel.
     *
     * @var int
     */
    protected $facebookChannel = 0;

    /**
     * Theater Details.
     *
     * @var string
     */
    protected $theaterDetails = '';

    /**
     * Constructor of this class.
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     */
    protected function initStorageObjects()
    {
        $this->multipleTimes = new ObjectStorage();
        $this->differentTimes = new ObjectStorage();
        $this->exceptions = new ObjectStorage();
        $this->categories = new ObjectStorage();
        $this->days = new ObjectStorage();
        $this->images = new ObjectStorage();
        $this->downloadLinks = new ObjectStorage();
    }
    
    /**
     * Returns the eventType
     *
     * @return string $eventType
     */
    public function getEventType()
    {
        return $this->eventType;
    }
    
    /**
     * Sets the eventType
     *
     * @param string $eventType
     * @return void
     */
    public function setEventType($eventType)
    {
        $this->eventType = (string)$eventType;
    }

    /**
     * Returns the hidden.
     *
     * @return bool $hidden
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Sets the hidden.
     *
     * @param bool $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = (bool)$hidden;
    }
    
    /**
     * Returns the topOfList.
     *
     * @return bool $topOfList
     */
    public function getTopOfList()
    {
        return $this->topOfList;
    }
    
    /**
     * Sets the topOfList.
     *
     * @param bool $topOfList
     */
    public function setTopOfList($topOfList)
    {
        $this->topOfList = (bool)$topOfList;
    }
    
    /**
     * Returns the title.
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;
    }

    /**
     * Returns the boolean state of topOfList.
     *
     * @return bool
     */
    public function isTopOfList()
    {
        return $this->getTopOfList();
    }

    /**
     * Returns the eventBegin.
     *
     * @return \DateTime $eventBegin
     */
    public function getEventBegin()
    {
        return $this->eventBegin;
    }

    /**
     * Sets the eventBegin.
     *
     * @param \DateTime $eventBegin
     */
    public function setEventBegin(\DateTime $eventBegin = null)
    {
        $this->eventBegin = $eventBegin;
    }

    /**
     * Returns the event_time.
     *
     * @return \JWeiland\Events2\Domain\Model\Time $time
     */
    public function getEventTime()
    {
        return $this->eventTime;
    }

    /**
     * Sets the event_time.
     *
     * @param Time $eventTime
     */
    public function setEventTime(Time $eventTime = null)
    {
        $this->eventTime = $eventTime;
    }

    /**
     * Returns the days of an event if it takes several days.
     *
     * @return int $durationInDays
     */
    public function getDaysOfEventsTakingDays()
    {
        $dateTimeUtility = new DateTimeUtility();

        $eventBegin = $dateTimeUtility->standardizeDateTimeObject($this->getEventBegin());
        $eventEnd = $dateTimeUtility->standardizeDateTimeObject($this->getEventEnd());
        if (!empty($eventEnd) && $eventEnd != $eventBegin) {
            $diff = $eventBegin->diff($eventEnd);
            // Example: 20.01.2013 - 23.01.2013 = 4 days but diff shows 3. So we have to add 1 day here
            return (int)$diff->format('%a') + 1;
        } else {
            return 0;
        }
    }

    /**
     * Returns the eventEnd.
     *
     * @return \DateTime $eventEnd
     */
    public function getEventEnd()
    {
        return $this->eventEnd;
    }

    /**
     * Sets the eventEnd.
     *
     * @param \DateTime $eventEnd
     */
    public function setEventEnd(\DateTime $eventEnd = null)
    {
        $this->eventEnd = $eventEnd;
    }

    /**
     * Returns the sameDay.
     *
     * @return bool $sameDay
     */
    public function getSameDay()
    {
        return $this->sameDay;
    }

    /**
     * Sets the sameDay.
     *
     * @param bool $sameDay
     */
    public function setSameDay($sameDay)
    {
        $this->sameDay = (bool)$sameDay;
    }

    /**
     * Returns the boolean state of sameDay.
     *
     * @return void
     */
    public function isSameDay()
    {
        $this->getSameDay();
    }

    /**
     * Returns the multipleTimes.
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $time
     */
    public function getMultipleTimes()
    {
        return $this->multipleTimes;
    }

    /**
     * Sets the multipleTimes.
     *
     * @param ObjectStorage $multipleTimes
     */
    public function setMultipleTimes(ObjectStorage $multipleTimes = null)
    {
        $this->multipleTimes = $multipleTimes;
    }

    /**
     * Returns the xth.
     *
     * @return array $xth
     */
    public function getXth()
    {
        $result = array();
        $items = $GLOBALS['TCA']['tx_events2_domain_model_event']['columns']['xth']['config']['items'];
        foreach ($items as $key => $item) {
            $result[$item[1]] = $this->xth & pow(2, $key);
        }

        return $result;
    }

    /**
     * Sets the xth.
     *
     * @param int $xth
     */
    public function setXth($xth)
    {
        $this->xth = $xth;
    }

    /**
     * Returns the weekday.
     *
     * @return array $weekday
     */
    public function getWeekday()
    {
        $result = array();
        $items = $GLOBALS['TCA']['tx_events2_domain_model_event']['columns']['weekday']['config']['items'];
        foreach ($items as $key => $item) {
            $result[$item[1]] = $this->weekday & pow(2, $key);
        }

        return $result;
    }

    /**
     * Sets the weekday.
     *
     * @param int $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }

    /**
     * Adds a Times.
     *
     * @param Time $differentTime
     */
    public function addDifferentTime(Time $differentTime = null)
    {
        $this->differentTimes->attach($differentTime);
    }

    /**
     * Removes a Times.
     *
     * @param Time $differentTime The Time to be removed
     */
    public function removeDifferentTime(Time $differentTime)
    {
        $this->differentTimes->detach($differentTime);
    }

    /**
     * Returns the differentTimes.
     *
     * @return ObjectStorage $differentTimes
     */
    public function getDifferentTimes()
    {
        return $this->differentTimes;
    }

    /**
     * Sets the differentTimes.
     *
     * @param ObjectStorage $differentTimes
     */
    public function setDifferentTimes(ObjectStorage $differentTimes = null)
    {
        $this->differentTimes = $differentTimes;
    }

    /**
     * Returns the eachWeeks.
     *
     * @return int $eachWeeks
     */
    public function getEachWeeks()
    {
        return $this->eachWeeks;
    }

    /**
     * Sets the eachWeeks.
     *
     * @param int $eachWeeks
     */
    public function setEachWeeks($eachWeeks)
    {
        $this->eachWeeks = $eachWeeks;
    }
    
    /**
     * Returns the recurringEnd
     *
     * @return \DateTime $recurringEnd
     */
    public function getRecurringEnd()
    {
        return $this->recurringEnd;
    }
    
    /**
     * Sets the recurringEnd
     *
     * @param \DateTime $recurringEnd
     * @return void
     */
    public function setRecurringEnd(\DateTime $recurringEnd = null)
    {
        $this->recurringEnd = $recurringEnd;
    }

    /**
     * Adds an Exception.
     *
     * @param Exception $exception
     */
    public function addException(Exception $exception)
    {
        $this->exceptions->attach($exception);
    }

    /**
     * Removes an Exception.
     *
     * @param Exception $exception
     */
    public function removeException(Exception $exception)
    {
        $this->exceptions->detach($exception);
    }

    /**
     * Returns the exceptions.
     *
     * @return ObjectStorage $exceptions
     */
    public function getExceptions()
    {
        return $this->exceptions;
    }

    /**
     * Returns the exceptions in future.
     *
     * @return array $exceptions
     */
    public function getFutureExceptions()
    {
        $futureExceptions = array();
        $currentDate = new \DateTime('today');
        /** @var Exception $exception */
        foreach ($this->exceptions as $exception) {
            if ($exception->getExceptionDate() > $currentDate) {
                $futureExceptions[$exception->getExceptionDate()->format('U')] = $exception;
            }
        }
        if (count($futureExceptions) === 1 && current($futureExceptions)->getExceptionDate() == $this->day->getDay()) {
            $futureExceptions = array();
        } else {
            ksort($futureExceptions, SORT_NUMERIC);
        }

        return $futureExceptions;
    }

    /**
     * Sets the Exceptions.
     *
     * @param ObjectStorage $exceptions
     */
    public function setExceptions(ObjectStorage $exceptions)
    {
        $this->exceptions = $exceptions;
    }
    
    /**
     * Returns the teaser.
     *
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }
    
    /**
     * Sets the teaser.
     *
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = (string)$teaser;
    }
    
    /**
     * Returns the detailInformations.
     *
     * @return string $detailInformations
     */
    public function getDetailInformations()
    {
        return $this->detailInformations;
    }

    /**
     * Sets the detailInformations.
     *
     * @param string $detailInformations
     */
    public function setDetailInformations($detailInformations)
    {
        $this->detailInformations = (string)$detailInformations;
    }

    /**
     * Returns the freeEntry.
     *
     * @return bool $freeEntry
     */
    public function getFreeEntry()
    {
        return $this->freeEntry;
    }

    /**
     * Sets the freeEntry.
     *
     * @param bool $freeEntry
     */
    public function setFreeEntry($freeEntry)
    {
        $this->freeEntry = (bool)$freeEntry;
    }

    /**
     * Returns the boolean state of freeEntry.
     *
     * @return bool
     */
    public function isFreeEntry()
    {
        return $this->getFreeEntry();
    }

    /**
     * Returns the ticketLink.
     *
     * @return \JWeiland\Events2\Domain\Model\Link $ticketLink
     */
    public function getTicketLink()
    {
        return $this->ticketLink;
    }

    /**
     * Sets the ticketLink.
     *
     * @param Link $ticketLink
     */
    public function setTicketLink(Link $ticketLink = null)
    {
        $this->ticketLink = $ticketLink;
    }

    /**
     * Adds a Category.
     *
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        $this->categories->attach($category);
    }

    /**
     * Removes a Category.
     *
     * @param Category $categoryToRemove The Category to be removed
     */
    public function removeCategory(Category $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Returns the categories.
     *
     * @return ObjectStorage $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Returns the category UIDs as array
     * This is a helper method
     *
     * @return array
     */
    public function getCategoryUids()
    {
        $categoryUids = array();
        /** @var Category $category */
        foreach ($this->categories as $category) {
            $categoryUids[] = $category->getUid();
        }
        return $categoryUids;
    }

    /**
     * Sets the categories.
     *
     * @param ObjectStorage $categories
     */
    public function setCategories(ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Adds a Day.
     *
     * @param Day $day
     */
    public function addDay(Day $day)
    {
        $this->days->attach($day);
    }

    /**
     * Removes a Day.
     *
     * @param Day $dayToRemove The Day to be removed
     */
    public function removeDay(Day $dayToRemove)
    {
        $this->days->detach($dayToRemove);
    }

    /**
     * Returns the days.
     *
     * @return ObjectStorage $days
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Sets the days.
     *
     * @param ObjectStorage $days
     */
    public function setDays(ObjectStorage $days)
    {
        $this->days = $days;
    }

    /**
     * Returns the location.
     *
     * @return Location $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location.
     *
     * @param Location $location
     */
    public function setLocation(Location $location = null)
    {
        $this->location = $location;
    }

    /**
     * Returns the organizer.
     *
     * @return Organizer $organizer
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * Sets the organizer.
     *
     * @param Organizer $organizer
     */
    public function setOrganizer(Organizer $organizer = null)
    {
        $this->organizer = $organizer;
    }

    /**
     * Returns the images.
     *
     * @return array $images
     */
    public function getImages()
    {
        // ObjectStorage has SplObjectHashes as key which we don't know in Fluid
        // so we convert ObjectStorage to array to get numbered keys
        $references = array();
        foreach ($this->images as $image) {
            $references[] = $image;
        }

        return $references;
    }

    /**
     * Sets the images.
     *
     * @param ObjectStorage $images
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the videoLink.
     *
     * @return Link $videoLink
     */
    public function getVideoLink()
    {
        return $this->videoLink;
    }

    /**
     * Sets the videoLink.
     *
     * @param Link $videoLink
     */
    public function setVideoLink(Link $videoLink = null)
    {
        $this->videoLink = $videoLink;
    }

    /**
     * Adds a DownloadLink.
     *
     * @param Link $downloadLink
     */
    public function addDownloadLink(Link $downloadLink)
    {
        $this->days->attach($downloadLink);
    }

    /**
     * Removes a VideoLink.
     *
     * @param Link $downloadLink The VideoLink to be removed
     */
    public function removeDownloadLink(Link $downloadLink)
    {
        $this->days->detach($downloadLink);
    }

    /**
     * Returns the DownloadLinks.
     *
     * @return ObjectStorage $videoLinks
     */
    public function getDownloadLinks()
    {
        return $this->downloadLinks;
    }

    /**
     * Sets the DownloadLinks.
     *
     * @param ObjectStorage $downloadLinks
     */
    public function setDownloadLinks(ObjectStorage $downloadLinks)
    {
        $this->downloadLinks = $downloadLinks;
    }

    /**
     * Returns the facebook.
     *
     * @return bool $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Sets the facebook.
     *
     * @param bool $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = (bool)$facebook;
    }

    /**
     * Returns the boolean state of facebook.
     *
     * @return bool
     */
    public function isFacebook()
    {
        return $this->getFacebook();
    }

    /**
     * Returns the releaseDate.
     *
     * @return \DateTime $releaseDate
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Sets the releaseDate.
     *
     * @param \DateTime $releaseDate
     */
    public function setReleaseDate(\DateTime $releaseDate = null)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * Returns the socialTeaser.
     *
     * @return string $socialTeaser
     */
    public function getSocialTeaser()
    {
        return $this->socialTeaser;
    }

    /**
     * Sets the socialTeaser.
     *
     * @param string $socialTeaser
     */
    public function setSocialTeaser($socialTeaser)
    {
        $this->socialTeaser = (string)$socialTeaser;
    }

    /**
     * Returns the facebookChannel.
     *
     * @return int $facebookChannel
     */
    public function getFacebookChannel()
    {
        return $this->facebookChannel;
    }

    /**
     * Sets the facebookChannel.
     *
     * @param int $facebookChannel
     */
    public function setFacebookChannel($facebookChannel)
    {
        $this->facebookChannel = (int)$facebookChannel;
    }

    /**
     * Returns the theaterDetails.
     *
     * @return string $theaterDetails
     */
    public function getTheaterDetails()
    {
        return $this->theaterDetails;
    }

    /**
     * Sets the theaterDetails.
     *
     * @param string $theaterDetails
     */
    public function setTheaterDetails($theaterDetails)
    {
        $this->theaterDetails = (string)$theaterDetails;
    }
}
