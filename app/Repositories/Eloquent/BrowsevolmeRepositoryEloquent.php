<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Repository\BrowsevolmeRepository;
use App\Models\Browsevolme;
use App\Validators\BrowsevolmeValidator;

/**
 * Class BrowsevolmeRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class BrowsevolmeRepositoryEloquent extends BaseRepository implements BrowsevolmeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Browsevolme::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
