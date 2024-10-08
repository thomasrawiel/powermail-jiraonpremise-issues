<?php

namespace TRAW\PowermailJiraonpremiseIssues\Configuration;

class ArrayConfiguration extends \JiraRestApi\Configuration\ArrayConfiguration
{
    public function __construct(array $configuration)
    {
        $this->jiraLogEnabled = true;
        $this->jiraLogFile = 'jira-rest-client.log';
        $this->jiraLogLevel = 'WARNING';
        $this->curlOptSslVerifyHost = false;
        $this->curlOptSslVerifyPeer = false;
        $this->curlOptSslCert = '';
        $this->curlOptSslCertPassword = '';
        $this->curlOptSslKey = '';
        $this->curlOptSslKeyPassword = '';
        $this->curlOptVerbose = false;
        $this->cookieAuthEnabled = false;
        $this->cookieFile = 'jira-cookie.txt';
        $this->curlOptUserAgent = $this->getDefaultUserAgentString();
        $this->serviceDeskId = null;

        $this->useTokenBasedAuth = false;
        $this->personalAccessToken = '';

        foreach ($configuration as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        if (!empty($this->personalAccessToken)) {
            $this->useTokenBasedAuth = true;
        }
    }
}
