<?php

namespace TRAW\PowermailJiraonpremiseIssues\Domain\Model;

use TRAW\PowermailJira\Domain\Model\IssueDocumentInterface;
use TRAW\PowermailJira\Events\PowermailSubmitEvent;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use In2code\Powermail\Domain\Model\Answer;

/**
 * Class IssueDocument
 * @package TRAW\PowermailJiraonpremiseIssues\Domain\Model
 */
class IssueDocument implements IssueDocumentInterface
{
    /**
     * @param PowermailSubmitEvent $event
     *
     * @return string
     */
    public function getDescriptionForIssue(PowermailSubmitEvent $event)
    {
        $uri = $event->getUri();
        $url = $uri->getScheme() . '://' . $uri->getHost() . $uri->getPath();
        $answers = $event->getMail()->getAnswers();

        $doc = '';

        $nl = '
        ';

        foreach ($answers->toArray() as $answer) {
            $doc .= $answer->getField()->getTitle() . ': ';

            switch ($answer->getValueType()) {
                case Answer::VALUE_TYPE_UPLOAD:
                case Answer::VALUE_TYPE_ARRAY:
                    foreach ($answer->getValue() as $uploadedFile) {
                        $doc .= $uploadedFile;
                    }
                    break;
                default:
                    $doc .= $answer->getValue();
            }
            $doc .= $nl . $nl;
        }

        $doc .= $nl . $nl;
        $doc .= '- - - This issue has been automatically created - - -' . $nl;
        $doc .= 'URL: ' . $url;

        return $doc;
    }

}
