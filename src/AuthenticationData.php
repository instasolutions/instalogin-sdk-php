<?php
/*
 * Copyright (c) 2021 InstaSolutions GmbH
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Instalogin;

class AuthenticationData
{

    /**
     * @var string
     */
    private $challenge;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var string
     */
    private $otp;

    /**
     * AuthenticationToken constructor.
     *
     * @param string $challenge
     * @param string $identifier
     * @param string $otp
     */
    public function __construct($challenge, $identifier, $otp)
    {
        $this->challenge = $challenge;
        $this->identifier = $identifier;
        $this->otp = $otp;
    }

    /**
     * @return string
     */
    public function getChallenge()
    {
        return $this->challenge;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getOtp()
    {
        return $this->otp;
    }

    /**
     * @param $array
     *
     * @return AuthenticationData
     */
    public static function fromArray($array)
    {
        $challenge = $array['challenge'] ?: null;
        $identifier = $array['identifier'] ?: null;
        $otp = $array['otp'] ?: null;

        return new AuthenticationData($challenge, $identifier, $otp);
    }

}