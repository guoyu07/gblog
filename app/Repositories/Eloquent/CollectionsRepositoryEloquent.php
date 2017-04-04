<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Repository\CollectionsRepository;
use App\Models\Collections;
use App\Validators\CollectionsValidator;

/**
 * Class CollectionsRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class CollectionsRepositoryEloquent extends BaseRepository implements CollectionsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Collections::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
