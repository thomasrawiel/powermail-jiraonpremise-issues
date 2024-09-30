<?php

namespace TRAW\PowermailJiraonpremiseIssues\Domain\Model;

use TRAW\PowermailJira\Domain\Model\IssueDocumentInterface;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class IssueDocument implements IssueDocumentInterface
{
    public function getDescriptionForIssue(ObjectStorage $answers)
    {
        $doc = '';

        foreach ($answers->toArray() as $answer) {
            $doc.='<p><strong>'.$answer->getField()->getTitle().'</strong></p>';

//            switch ($answer->getValueType()) {
//                case Answer::VALUE_TYPE_UPLOAD:
//                case Answer::VALUE_TYPE_ARRAY:
//                    foreach ($answer->getValue() as $uploadedFile) {
//                        $doc->paragraph()->text($uploadedFile)->end();
//                    }
//                    break;
//                default:
//                    $doc->paragraph()->text($answer->getValue())->end();
//            }

        }



//        $doc->paragraph()->em('- - - This issue has been automatically created - - -')->end();
//        $doc->paragraph()->em('URL: ' . $url)->end();

        return $doc;
    }

}
