<?php

namespace Modules\ERP\Service\TransactionPurpose;

use Modules\Core\Service\BaseService;
use Modules\ERP\Entities\TransactionPurpose;
use Modules\ERP\Repository\TransactionPurposeRepository;

class TransactionPurposeService extends BaseService
{
    protected array $filter_fields;
    public function __construct(TransactionPurposeRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'title' => ['type' => 'string'],
            'type' => ['type' => 'string']
        ];

        $this->attributes = [
            'id',
            'title',
            'type',
            'updated_at'
        ];
    }


    public function edit($params, $id)
    {
        $purpose = TransactionPurpose::findOrFail($id);
        if ($purpose->canBeChanged == 1) {
            $purpose->type = $params['type'];
            $purpose->title = $params['title'];
            $purpose->save();
            return $purpose;
        } else 
            return false;
        
    }

    public function delete(int $id)
    {
        $purpose = TransactionPurpose::findOrFail($id);
        if ($purpose->canBeChanged == true) {
            $purpose->delete();
        }else
            return false;
    }
}
