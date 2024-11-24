<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// Контроллер используется для вынесения в отдельный файл документации для Swagger
// TODO - добавить multiplart/form-data для корректной загрузки файлов в Swagger
/**
 * @OA\Info(
 *     title="My Swagger Doc",
 *     version="1.0.0"
 * ),
 *
 * @OA\PathItem(
 *     path="/api/"
 * ),
 *
 * @OA\Post(
 *     path="/api/v1/notes",
 *     summary="Adds a new note",
 *     tags={"Note"},
 *
 *  @OA\RequestBody(
 *      @OA\JsonContent(
 *          allOf={
 *              @OA\Schema(
 *                  @OA\Property(property="fio", type="string", example="Ivanov Ivan Ivanovich"),
 *                  @OA\Property(property="phone", type="integer", example="89998887766"),
 *                  @OA\Property(property="company", type="string", example="Google"),
 *                  @OA\Property(property="email", type="email", example="test@mail.ru"),
 *                  @OA\Property(property="birthday", type="date", example="1990-01-01"),
 *                  @OA\Property(property="photo", type="string", example="NULL"),
 *              )
 *            }
 *          )
 *        ),
 *
 * @OA\Response(
 *      response=201,
 *      description="Note added",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="object",
 *              @OA\Property(property="fio", type="string", example="Ivanov Ivan Ivanovich"),
 *              @OA\Property(property="phone", type="integer", example="89998887766"),
 *              @OA\Property(property="company", type="string", example="Google"),
 *              @OA\Property(property="email", type="string", example="test@mail.ru"),
 *              @OA\Property(property="birthday", type="string", format="date", example="1990-01-01"),
 *              @OA\Property(property="photo", type="string", example=null),
 *              @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z"),
 *              @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z"),
 *              @OA\Property(property="id", type="integer", example=5),
 *          ),
 *
 *      @OA\Property(property="message", type="string", example="Запись успешно создана"),
 *      @OA\Property(property="status", type="integer", example="201"),
 *        ),
 *      ),
 *
 * @OA\Get(
 *     path="/api/v1/notes",
 *     summary="Get all notes",
 *     tags={"Note"},
 * @OA\Response(
 *     response=200,
 *     description="Done",
 *     @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example=5),
 *              @OA\Property(property="fio", type="string", example="Ivanov Ivan Ivanovich"),
 *              @OA\Property(property="phone", type="integer", example="89998887766"),
 *              @OA\Property(property="company", type="string", example="Google"),
 *              @OA\Property(property="email", type="string", example="test@mail.ru"),
 *              @OA\Property(property="birthday", type="string", format="date", example="1990-01-01"),
 *              @OA\Property(property="photo", type="string", example=null),
 *              @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z"),
 *              @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z")
 *          ),
 *     ),
 *
 * @OA\Property(property="meta", type="object",
 *       @OA\Property(property="CurrentPage", type="integer", example=5),
 *       @OA\Property(property="LastPage", type="integer", example=1),
 *       @OA\Property(property="PerPage", type="integer", example=2),
 *       @OA\Property(property="Total", type="integer", example=5)
 *     ),
 *       @OA\Property(property="status", type="integer", example=200)
 *          ),
 *        ),
 *      ),
 *
 * @OA\Get(
 *     path="/api/v1/notes/{note}",
 *     summary="Get one note",
 *     tags={"Note"},
 * @OA\Parameter(
 *     description="Note ID",
 *     in="path",
 *     name="note",
 *     required=true,
 *     example=1
 *     ),
 *
 * @OA\Response(
 *     response=200,
 *     description="Done",
 *     @OA\JsonContent(
 *         @OA\Property(property="content", type="object",
 *             @OA\Property(property="id", type="integer", example=5),
 *             @OA\Property(property="fio", type="string", example="Ivanov Ivan Ivanovich"),
 *             @OA\Property(property="phone", type="integer", example="89998887766"),
 *             @OA\Property(property="company", type="string", example="Google"),
 *             @OA\Property(property="email", type="string", example="test@mail.ru"),
 *             @OA\Property(property="birthday", type="string", format="date", example="1990-01-01"),
 *             @OA\Property(property="photo", type="string", example=null),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z"),
 *             @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z")
 *             ),
 *         @OA\Property(property="message", type="string", example="Успешный вывод элемента"),
 *         @OA\Property(property="status", type="integer", example=200)
 *           ),
 *         ),
 *       ),
 *
 * @OA\Put(
 *     path="/api/v1/notes/{note}",
 *     summary="Update one note",
 *     tags={"Note"},
 *     @OA\Parameter(
 *         description="Note ID",
 *         in="path",
 *         name="note",
 *         required=true,
 *         example=1
 *     ),
 *
 * @OA\RequestBody(
 *   @OA\JsonContent(
 *      allOf={
 *          @OA\Schema(
 *          @OA\Property(property="fio", type="string", example="Ivanov Ivan Ivanovich"),
 *          @OA\Property(property="phone", type="integer", example="89998887766"),
 *          @OA\Property(property="company", type="string", example="Google"),
 *          @OA\Property(property="email", type="email", example="test@mail.ru"),
 *          @OA\Property(property="birthday", type="date", example="1990-01-01"),
 *          @OA\Property(property="photo", type="file", example="NULL"),
 *                    )
 *                  }
 *                )
 *              ),
 *
 * @OA\Response(
 *      response=200,
 *      description="Done",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="object",
 *          @OA\Property(property="fio", type="string", example="Ivanov Ivan Ivanovich"),
 *          @OA\Property(property="phone", type="integer", example="89998887766"),
 *          @OA\Property(property="company", type="string", example="Google"),
 *          @OA\Property(property="email", type="string", example="test@mail.ru"),
 *          @OA\Property(property="birthday", type="string", format="date", example="1990-01-01"),
 *          @OA\Property(property="photo", type="string", example=null),
 *          @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z"),
 *          @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z"),
 *          @OA\Property(property="id", type="integer", example=5),```
 */
class SwaggerController extends Controller {}
