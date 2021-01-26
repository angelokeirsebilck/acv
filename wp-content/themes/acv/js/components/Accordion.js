import React, { useEffect, useState } from 'react';
import reactDOM from 'react-dom';
import PropTypes from 'prop-types';
import axios from 'axios';
import { CgArrowDownR } from 'react-icons/cg';

const Accordion = () => {
    const [data, setData] = useState();
    const [clickedItemIndex, setClickedItemIndex] = useState(0);

    useEffect(() => {
        async function loadData() {
            const result = await axios
                .get('http://localhost/acv/wp-json/acv/v1/practiceArea')
                .then((response) => {
                    setData(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        }

        loadData();
    }, []);

    return (
        <div className='Accordion'>
            {data != null
                ? data.map((item, index) => {
                      return (
                          <AccordionItem
                              key={index}
                              id={index}
                              name={item.name}
                              active={index == clickedItemIndex ? true : false}
                              description={item.description}
                              clickHandler={() => setClickedItemIndex(index)}
                          />
                      );
                  })
                : null}
        </div>
    );
};

const AccordionItem = ({ name, description, active, clickHandler }) => {
    return (
        <div className='Accordion-item'>
            <div className='Accordion-header' onClick={clickHandler}>
                <div className='Accordion-name'>{name}</div>
                <CgArrowDownR style={{ fontSize: 30 }} />
            </div>
            <div
                className={
                    active
                        ? 'Accordion-description Accordion-description--active'
                        : 'Accordion-description '
                }>
                {description}
            </div>
        </div>
    );
};

AccordionItem.propTypes = {
    id: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
};

reactDOM.render(<Accordion />, document.querySelector('.PracticeArea'));
