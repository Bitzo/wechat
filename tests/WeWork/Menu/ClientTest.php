<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\WeWork\Menu;

use EasyWeChat\Kernel\ServiceContainer;
use EasyWeChat\Tests\TestCase;
use EasyWeChat\WeWork\Menu\Client;

class ClientTest extends TestCase
{
    public function testGet()
    {
        $client = $this->mockApiClient(Client::class, [], new ServiceContainer(['agent_id' => 203874]));
        $client->expects()->httpGet('menu/get', ['agentid' => 203874])->andReturn('mock-result')->once();
        $this->assertSame('mock-result', $client->get());
    }

    public function testCreate()
    {
        $client = $this->mockApiClient(Client::class, [], new ServiceContainer(['agent_id' => 203874]));
        $client->expects()->httpPostJson('menu/create', ['foo' => 'bar'], ['agentid' => 203874])->andReturn('mock-result')->once();
        $this->assertSame('mock-result', $client->create(['foo' => 'bar']));
    }

    public function testDelete()
    {
        $client = $this->mockApiClient(Client::class, [], new ServiceContainer(['agent_id' => 203874]));
        $client->expects()->httpGet('menu/delete', ['agentid' => 203874])->andReturn('mock-result')->once();
        $this->assertSame('mock-result', $client->delete());
    }
}
