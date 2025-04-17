package com.example.efm_mobile_todo.data.repository

import com.example.efm_mobile_todo.data.model.Todo
import com.example.efm_mobile_todo.data.remote.RetrofitInstance

// Repository class

class TodoRepository {
    suspend fun getTodos() = RetrofitInstance.api.getTodos().take(4)
    suspend fun addTodo(todo: Todo) = RetrofitInstance.api.addTodo(todo)
    suspend fun updateTodo(todo: Todo) = RetrofitInstance.api.updateTodo(todo.id!!, todo)
    suspend fun deleteTodo(id: Int) = RetrofitInstance.api.deleteTodo(id)
}