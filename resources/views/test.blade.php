$Attendance = Attendance::join('users', 'attendances.user_id', '=', 'users.id')->where('users.role_id',2)->get();