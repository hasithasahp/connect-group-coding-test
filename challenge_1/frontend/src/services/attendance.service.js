import http from "../http-common";

class AttendanceDataService {
    getAll() {
        return http.get('/attendance');
    }
}

export default new AttendanceDataService();