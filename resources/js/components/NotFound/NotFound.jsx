import React, { Component } from 'react';

class NotFound extends Component {
    render() {
        return (
            <p className="notfound">404<span className="error">Error</span><span className="pagenotfound">Page not found</span></p>
        );
    }
}

export default NotFound;