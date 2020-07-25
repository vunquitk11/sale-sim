import React, { Component } from 'react';

class ListFilter extends Component {
    render() {
        const renderItem = this.props.data.map((Item, index) => 
            <li key={Item}><a href="/sim/xxx">{Item}</a></li>
        );
        return (
            <ul className="under-fill">
                {renderItem}
            </ul>
        );
    }
}

export default ListFilter;