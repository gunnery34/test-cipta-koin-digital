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