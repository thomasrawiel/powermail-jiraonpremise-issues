<?php
declare(strict_types=1);
namespace TRAW\PowermailJiraonpremiseIssues\Configuration;

class ArrayConfiguration extends \JiraRestApi\Configuration\ArrayConfiguration
{
    public function __construct(array $configuration)
    {
        parent::__construct($configuration);

        if (!empty($this->personalAccessToken)) {
            $this->useTokenBasedAuth = true;
        }
    }
}
