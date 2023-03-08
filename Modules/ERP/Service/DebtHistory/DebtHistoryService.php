<?php

namespace Modules\ERP\Service\DebtHistory;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\DebtHistoryRepository;

class DebtHistoryService extends BaseService
{
    protected array $filter_fields;
    public function __construct(DebtHistoryRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'id' => ['type' => 'numeric']
        ];

        $this->relation = ['user:id,username'];
    }
}