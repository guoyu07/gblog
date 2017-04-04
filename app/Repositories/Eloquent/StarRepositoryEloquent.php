<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Repository\StarRepository;
use App\Models\Star;
use App\Validators\StarValidator;

/**
 * Class StarRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class StarRepositoryEloquent extends BaseRepository implements StarRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Star::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
