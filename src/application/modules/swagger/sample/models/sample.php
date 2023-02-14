<?php

namespace models;
/**
 * @OA\Schema(
 *     title="sample model",
 *     description="sample model",
 * )
 */
class sample {
	/**
	 * @OA\Property(format="int64",description="Sample ID",title="Sample ID")
	 * @var integer
	 */
	private $sampleId;

	/**
	 * @OA\Property(format="int64",description="ID",title="ID")
	 * @var integer
	 */
	private $id;

	/**
	 * @OA\Property(description="Sample Title", title="Title")
	 * @var string
	 */
	private $title;

	/**
	 * @OA\Property(description="Sample Body",title="Body")
	 * @var string
	 */
	private $body;
}
