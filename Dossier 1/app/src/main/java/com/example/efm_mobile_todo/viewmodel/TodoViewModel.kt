package com.example.efm_mobile_todo.viewmodel

import androidx.compose.runtime.mutableStateListOf
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.example.efm_mobile_todo.data.model.Todo
import com.example.efm_mobile_todo.data.repository.TodoRepository
import kotlinx.coroutines.launch

// ViewModel class

class TodoViewModel : ViewModel() {
    private val repo = TodoRepository()
    var todos = mutableStateListOf<Todo>()

    init {
        getTodos()
    }

    fun getTodos() {
        viewModelScope.launch {
            todos.clear()
            todos.addAll(repo.getTodos())
        }
    }

    fun addTodo(todo: Todo) {
        viewModelScope.launch {
            val newTodo = repo.addTodo(todo)
            todos.add(newTodo)
        }
    }

    fun updateTodo(todo: Todo) {
        viewModelScope.launch {
            val updated = repo.updateTodo(todo)
            todos.replaceAll { if (it.id == updated.id) updated else it }
        }
    }

    fun deleteTodo(id: Int) {
        viewModelScope.launch {
            repo.deleteTodo(id)
            todos.removeIf { it.id == id }
        }
    }
}