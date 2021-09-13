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

class ProvisionData
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $expiresAt;

    /**
     * @var Identity
     */
    private $identity;

    /**
     * ProvisioningToken constructor.
     *
     * @param string $id
     * @param string $createdAt
     * @param string $expiresAt
     * @param Identity $identity
     */
    public function __construct($id, $createdAt, $expiresAt, Identity $identity)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->expiresAt = $expiresAt;
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param $array
     *
     * @return ProvisionData
     */
    public static function fromArray($array)
    {
        $id = $array['id'] ?: null;
        $createdAt = $array['createdAt'] ?: null;
        $expiresAt = $array['expiresAt'] ?: null;
        $identity = Identity::fromArray($array['identity']);

        return new ProvisionData($id, $createdAt, $expiresAt, $identity);
    }
}