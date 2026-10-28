export default () => ({

    page: 'schedule',

    day: 1,

    attendanceModal: false,

    agreeAttendance: false,

    attendanceDay: null,

    attendance: {
        1: false,
        2: false,
        3: false
    },

    openAttendance(day) {
        this.attendanceDay = day;
        this.agreeAttendance = false;
        this.attendanceModal = true;
    },

    closeAttendance() {
        this.attendanceModal = false;
        this.agreeAttendance = false;
        this.attendanceDay = null;
    },

    confirmAttendance() {
        this.attendance[this.attendanceDay] = true;
        this.closeAttendance();

        // TODO: Later send to Laravel
        // axios.post('/attendance', {...})
    }

});