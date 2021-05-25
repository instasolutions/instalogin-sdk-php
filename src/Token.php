<?php
/*
 * Copyright (c) 2021 INSTA Holding AG
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

class Token
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
    private $deviceName;

    /**
     * @var string
     */
    private $deviceLabel;

    /**
     * @var string
     */
    private $deviceModel;

    /**
     * Device constructor.
     *
     * @param string $id
     * @param string $createdAt
     * @param string $deviceName
     * @param string $deviceLabel
     * @param string $deviceModel
     */
    public function __construct($id, $createdAt, $deviceName, $deviceLabel, $deviceModel)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->deviceName = $deviceName;
        $this->deviceLabel = $deviceLabel;
        $this->deviceModel = $deviceModel;
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
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * @return string
     */
    public function getDeviceLabel()
    {
        return $this->deviceLabel;
    }

    /**
     * @return string
     */
    public function getDeviceModel()
    {
        return $this->deviceModel;
    }

    /**
     * @param $array
     *
     * @return Token
     */
    public static function fromArray($array)
    {
        $id    = $array['id'] ?:  null;
        $createdAt = $array['createdAt'] ?: null;
        $deviceName  = $array['deviceName'] ?: null;
        $deviceLabel = $array['deviceLabel'] ?: null;
        $deviceModel = $array['deviceModel'] ?: null;

        return new Token($id, $createdAt, $deviceName, $deviceLabel, $deviceModel);
    }

}