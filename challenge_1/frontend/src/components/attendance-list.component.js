import React,{ Component } from "react";
import Table from 'react-bootstrap/Table';
import attendanceService from "../services/attendance.service";


export default class AttendanceList extends Component {
    constructor(props) {
        super(props);

        this.retrieveData = this.retrieveData.bind(this);

        this.state = {
            records: []
        };
    }

    componentDidMount() {
        this.retrieveData();
    }

    retrieveData() {
        attendanceService.getAll()
            .then(response => {
                this.setState({
                    records: response.data
                });
                console.log(response.data);
            })
            .catch(e => {
                console.log(e);
            });
    }

    render() {
        const { records } = this.state;

        return (
        <Table striped>
            <thead>
            <tr>
                <th>Name</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Total Working Hours</th>
            </tr>
            </thead>
            <tbody>
            { records && records.map(({ employee, checkin_at, checkout_at, worked_hours }, index) => (
                <tr key={ index }>
                    <td>{ employee.name }</td>
                    <td>{ (worked_hours > 0)  ? checkin_at : 'N/A' }</td>
                    <td>{ (worked_hours > 0)  ? checkout_at : 'N/A' }</td>
                    <td>{ worked_hours }</td>
                </tr>
            )) }
            </tbody>
        </Table>);
    }
}