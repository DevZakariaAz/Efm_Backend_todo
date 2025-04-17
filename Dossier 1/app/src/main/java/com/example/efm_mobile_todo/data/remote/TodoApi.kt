package com.example.efm_mobile_todo.data.remote

import com.example.efm_mobile_todo.data.model.Todo
import retrofit2.Response
import retrofit2.http.Body
import retrofit2.http.DELETE
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.PUT
import retrofit2.http.Path

// Retrofit interface

interface TodoApi {
    @GET("todos")
    suspend fun getTodos(): List<Todo>

    @POST("todos")
    suspend fun addTodo(@Body todo: Todo): Todo

    @PUT("todos/{id}")
    suspend fun updateTodo(@Path("id") id: Int, @Body todo: Todo): Todo

    @DELETE("todos/{id}")
    suspend fun deleteTodo(@Path("id") id: Int): Response<Unit>
}
