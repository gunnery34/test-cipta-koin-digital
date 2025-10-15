# REST API Authentication dengan JWT

## Base URL
```
http://127.0.0.1:8000/api
```

## Endpoints

### 1. Register User
**POST** `/auth/register`

**Request Body:**
```json
{
    "name": "SUper Admin",
    "email": "super@admin.local",
    "password": "rahasia123",
    "password_confirmation": "rahasia123"
}
```

**Response (Success):**
```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "SUper Admin",
            "email": "super@admin.local",
            "email_verified_at": null,
            "created_at": "2025-10-16T00:00:00.000000Z",
            "updated_at": "2025-10-16T00:00:00.000000Z"
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
        "token_type": "bearer",
        "expires_in": 3600
    }
}
```

### 2. Login User
**POST** `/auth/login`

**Request Body:**
```json
{
    "email": "super@admin.local",
    "password": "rahasia123"
}
```

**Response (Success):**
```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "SUper Admin",
            "email": "super@admin.local",
            "email_verified_at": null,
            "created_at": "2025-10-16T00:00:00.000000Z",
            "updated_at": "2025-10-16T00:00:00.000000Z"
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
        "token_type": "bearer",
        "expires_in": 3600
    }
}
```

### 3. Get User Profile (Protected)
**GET** `/auth/profile`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "SUper Admin",
        "email": "super@admin.local",
        "email_verified_at": null,
        "created_at": "2025-10-16T00:00:00.000000Z",
        "updated_at": "2025-10-16T00:00:00.000000Z"
    }
}
```

### 4. Logout (Protected)
**POST** `/auth/logout`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success):**
```json
{
    "success": true,
    "message": "Successfully logged out"
}
```

### 5. Refresh Token (Protected)
**POST** `/auth/refresh`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success):**
```json
{
    "success": true,
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
        "token_type": "bearer",
        "expires_in": 3600
    }
}
```

## Todo API Endpoints

### 6. Get All Todos (Protected)
**GET** `/todos`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "title": "Buat REST API",
        "description": "Untuk Test PT Cipta Koin Digital",
        "is_done": false,
        "user_id": 1,
        "created_at": "2025-10-15T19:45:00.000000Z",
        "updated_at": "2025-10-15T19:45:00.000000Z"
    }
}
```

### 7. Create Todo (Protected)
**POST** `/todos`

**Headers:**
```
Authorization: Bearer {token}
```

**Request Body:**
```json
{
    "title": "Buat REST API",
    "description": "Untuk Test PT Cipta Koin Digital",
    "is_done": false,
}
```

**Response (Success):**
```json
{
    "success": true,
    "message": "Todo created successfully",
    "data": {
        "id": 1,
        "title": "Buat REST API",
        "description": "Untuk Test PT Cipta Koin Digital",
        "is_done": false,
        "user_id": 1,
        "created_at": "2025-10-15T20:15:00.000000Z",
        "updated_at": "2025-10-15T20:15:00.000000Z"
    }
}
```

**Response (Validation Error):**
```json
{
    "message": "Judul todo harus diisi.",
    "errors": {
        "title": ["Judul todo harus diisi."]
    }
}
```

### 8. Get Single Todo (Protected)
**GET** `/todos/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "title": "Buat REST API",
        "description": "Untuk Test PT Cipta Koin Digital",
        "is_done": false,
        "user_id": 1,
        "created_at": "2025-10-15T19:45:00.000000Z",
        "updated_at": "2025-10-15T19:45:00.000000Z"
    }
}
```

**Response (Not Found):**
```json
{
    "success": false,
    "message": "Todo not found"
}
```

### 9. Update Todo (Protected)
**PUT** `/todos/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Request Body:**
```json
{
    "title": "Buat REST API",
    "description": "Untuk Test PT Cipta Koin Digital",
    "is_done": true,
}
```

**Response (Success):**
```json
{
    "success": true,
    "message": "Todo updated successfully",
    "data": {
        "id": 1,
        "title": "Buat REST API",
        "description": "Untuk Test PT Cipta Koin Digital",
        "is_done": true,
        "user_id": 1,
        "created_at": "2025-10-15T19:45:00.000000Z",
        "updated_at": "2025-10-15T20:20:00.000000Z"
    }
}
```

**Response (Validation Error):**
```json
{
    "message": "Judul todo harus diisi.",
    "errors": {
        "title": ["Judul todo harus diisi."]
    }
}
```

**Response (Not Found):**
```json
{
    "success": false,
    "message": "Todo not found"
}
```

### 10. Delete Todo (Protected)
**DELETE** `/todos/{id}`

**Headers:**
```
Authorization: Bearer {token}
```

**Response (Success):**
```json
{
    "success": true,
    "message": "Todo deleted successfully"
}
```

**Response (Not Found):**
```json
{
    "success": false,
    "message": "Todo not found"
}
```

## Error Responses

### Unauthenticated
```json
{
    "message": "Unauthenticated."
}
```

### Unauthorized (Accessing other user's todo)
```json
{
    "success": false,
    "message": "Unauthorized"
}
```

### Validation Error
```json
{
    "message": "The given data was invalid.",
    "errors": {
        "field_name": ["Error message"]
    }
}
```