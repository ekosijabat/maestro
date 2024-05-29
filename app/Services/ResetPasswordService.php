<?php

namespace App\Services;

use App\Models\PasswordResets;
use App\Repositories\ResetPasswordRepository;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class ResetPasswordService {
    protected $resetRepository;

    public function __construct(ResetPasswordRepository $resetRepository) {
        $this->resetRepository = $resetRepository;
    }

    public function saveData($data) {
        DB::beginTransaction();

        try {
            $reset = $this->resetRepository->save($data);
        } catch (Exception $e) {
            DB::rollBack();
            print_r ($e->getMessage()); die;
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to save data');
        }

        DB::commit();

        return $reset;
    }

    public function checkExist($data) {
        return $this->resetRepository->checkExist($data);
    }

    public function deleteByEmail($email) {
        DB::beginTransaction();

        try {
            $reset = $this->resetRepository->deleteByEmail($email);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete data');
        }

        DB::commit();

        return $reset;
    }
}
