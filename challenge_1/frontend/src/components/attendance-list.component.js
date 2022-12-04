import React,{ Component } from "react";
import Table from 'react-bootstrap/Table';


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
            </tbody>
        </Table>);
    }
}