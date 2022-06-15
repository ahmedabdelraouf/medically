<?php

namespace Dev\Domain\Service;

use App\Http\Resources\ContactUsResource;
use Dev\Application\Utility\UserGender;
use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Repository\ComplaintRepository;
use Dev\Infrastructure\Repository\ContactUsRepository;
use Illuminate\Http\JsonResponse;

/**
 * Class ContactUsService
 * @package Dev\Domain\Service
 */
class ContactUsService extends AbstractService
{

    /**
     * ContactUsService constructor.
     * @param ContactUsRepository $repository
     */
    public function __construct(ContactUsRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filter
     * @return array
     */
    public function index(array $filter = []): array
    {
        $types = $this->repository;
//        if (isset($filter['phone']))
//            $types = $types->where('phone', 'LIKE', '%' . $filter['phone'] . '%');
        return $this->prepare_response(false,
            null, 'Contact us created successfully.',
            ContactUsResource::collection($types->get()),
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $contactUs = $this->repository->create($data);
        return $this->prepare_response(false, null,
            'Contact us created successfully.',
            new ContactUsResource($contactUs),
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->prepare_response(false, null,
            'Contact us returned successfully.',
            new ContactUsResource($this->repository->findOrFail($id)),
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $contactUs = $this->repository->find($id);
        if (isset($contactUs))
            if ($this->repository->find($id)->delete())
                return $this->prepare_response(false, null,
                    'Contact us removed successfully.', null,
                    JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
        return $this->prepare_response(true, null, 'Something wrong happened while deleting type', null,
            JsonResponse::HTTP_BAD_REQUEST, JsonResponse::HTTP_BAD_REQUEST);
    }

    /**
     * @param $contactUs
     * @param array $data
     * @return mixed
     */
    public function update(array $data, $contactUs)
    {
        if ($contactUs->update($data))
            return $this->prepare_response(false, null,
                'Contact us updated successfully.',
                new ContactUsResource($contactUs),
                JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);

        return $this->prepare_response(true, null,
            'Something wrong happened when deleting object',
            new ContactUsResource($contactUs),
            JsonResponse::HTTP_BAD_REQUEST,
            JsonResponse::HTTP_BAD_REQUEST);
    }

    public function getStatistics()
    {
        return [
            'total_contact_us_count'=>$this->repository->count(),
            'total_contact_us_contacted_count'=>$this->repository->where('status',1)->count(),
            'total_contact_us_not_contacted_count'=>$this->repository->where('status',0)->count(),
        ];
    }

}
