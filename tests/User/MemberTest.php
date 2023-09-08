<?php

namespace Tests\User;

use App\Auth\AuthException;
use App\User\Member;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    private static ?Member $member = null;

    public static function setUpBeforeClass(): void
    {
        static::$member = new Member('John', 'john_doe', 'abcd1234', 30);
    }

    /**
     * @group member
     */
    public function testAuthSucceedsWithCorrectLoginAndPassword(): void
    {
        $this->assertTrue(static::$member->auth('john_doe', 'abcd1234'));
    }

    /**
     * @dataProvider provideLoginAndPassword
     * @group member
     */
    public function testAuthFailsWithIncorrectLoginOrPassword(string $login, string $password): void
    {
        $this->expectException(AuthException::class);

        static::$member->auth($login, $password);
    }

    public static function provideLoginAndPassword(): iterable
    {
        $data = [
            'login' => ['john', 'abcd1234'] ,
            'password' => ['john_doe', 'abcd'],
        ];

        foreach ($data as $key => $datum) {
            yield $key => $datum;
        }
    }
}
