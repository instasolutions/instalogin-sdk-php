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

class Device
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
    private $label;

    /**
     * @var string
     */
    private $model;

    /**
     * Device constructor.
     *
     * @param string $id
     * @param string $createdAt
     * @param string $label
     * @param string $model
     */
    public function __construct($id, $createdAt, $label, $model)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->label = $label;
        $this->model = $model;
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $array
     *
     * @return Device
     */
    public static function fromArray($array)
    {
        $id = $array['id'] ?:  null;
        $createdAt = $array['createdAt'] ?: null;
        $label = $array['label'] ?: null;
        $model = $array['model'] ?: null;

        return new Device($id, $createdAt, $label, $model);
    }

}