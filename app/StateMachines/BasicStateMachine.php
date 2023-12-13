<?php

namespace App\StateMachines;

use Asantibanez\LaravelEloquentStateMachines\StateMachines\StateMachine;

class BasicStateMachine extends StateMachine
{
    const PENDING = 'รอดำเนินการ';
    const OPEN = 'เปิดร้าน';
    const CLOSE = 'ปิดร้าน';
    const FINISHED = 'จบงาน';
    const STATES = [
            self::PENDING, #รอดำเนินการ
            self::OPEN, #เปิดร้าน
            self::CLOSE, #ปิดร้าน
            self::FINISHED, #จบงาน
    ];

    public function recordHistory(): bool
    {
        return true;
    }

    public function transitions(): array
    {
        return [
            self::PENDING => [ self::OPEN ],
            self::OPEN => [ self::CLOSE ],
            self::CLOSE => [ self::FINISHED ],
        ];
    }

    public function defaultState(): ?string
    {
        return 'รอการจัดรถ';
    }
}
