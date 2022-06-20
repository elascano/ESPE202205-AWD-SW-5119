import React from 'react';

import HomepageHeader from './components/homepage/HomepageHeader';
import Presentation from './components/homepage/Presentation';
import News from './components/homepage/News';
import HomepageFooter from './components/homepage/HomepageFooter';

function Homepage(){
    return(
        <div>
            <HomepageHeader />
            <Presentation />
            <News />
            <HomepageFooter />
        </div>
    )
}

export default Homepage;