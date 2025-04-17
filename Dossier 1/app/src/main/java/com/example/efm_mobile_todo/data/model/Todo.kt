package com.example.efm_mobile_todo.data.model

data class Todo(
    val id: Int? = null,
    val title: String,
    val completed: Boolean = false
)