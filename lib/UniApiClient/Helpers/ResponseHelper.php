<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 17:30
     */

    namespace UniApiClient\Helpers;

    use Psr\Http\Message\ResponseInterface;

    /**
     * Class ResponseHelper
     *
     * @package UniApiClient\Helpers
     */
    trait ResponseHelper {

        /**
         * @param ResponseInterface $response
         */
        private function logWarnings(ResponseInterface $response)
        {
            $body = (string) $response->getBody();
            if (false === strpos($body, '"warnings"')) {
                return;
            }
            $data = json_decode($body, true);
            if (!isset($data['warnings'])) {
                return;
            }
            foreach ($data['warnings'] as $warning) {
                $this->logger->warning(isset($warning['url'])
                        ? sprintf('%s (%s)', $warning['message'], $warning['url'])
                        : $warning['message']);
            }
        }
    }