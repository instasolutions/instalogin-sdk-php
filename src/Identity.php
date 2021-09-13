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

class Identity
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var Token[]
     */
    private $tokens;

    /**
     * Identity constructor.
     *
     * @param string $id
     * @param bool $enabled
     * @param string $createdAt
     * @param string $identifier
     * @param Token[] $tokens
     */
    public function __construct($id, $enabled, $createdAt, $identifier, array $tokens)
    {
        $this->id = $id;
        $this->enabled = $enabled;
        $this->createdAt = $createdAt;
        $this->identifier = $identifier;
        $this->tokens = $tokens;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
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
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return Token[]
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * @param $array
     *
     * @return Identity
     */
    public static function fromArray($array)
    {
        $id = $array['id'] ?: null;
        $createdAt = $array['createdAt'] ?: null;
        $identifier = $array['identifier'] ?: null;
        $enabled = $array['enabled'] ?: false;
        $tokens = [];

        foreach ($array['tokens'] as $item) {
            $tokens[] = Token::fromArray($item);
        }

        return new Identity($id, $enabled, $createdAt, $identifier, $tokens);
    }

}