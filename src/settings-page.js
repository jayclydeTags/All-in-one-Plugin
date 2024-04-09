import {
    __experimentalDivider as Divider,
    __experimentalText as Text,
    __experimentalVStack as VStack,
    __experimentalHeading as Heading,
    Button,
    Tip,
    Card,
    CardHeader,
    CardBody,
    CardFooter,
    ToggleControl,
    TabPanel,
} from '@wordpress/components';
import { useState } from '@wordpress/element';

export default function SettingsPage() {

    const [isActive, setIsActive] = useState(false);

    const onSelect = (tabName) => {
        console.log('Selecting tab', tabName);
    };

    return (
        <>
            <VStack spacing={4}>
                <Text>Some text here</Text>
                <Divider />
                <Text>Some more text here</Text>

            </VStack>

            <Tip>
                An example tip
            </Tip>

            <TabPanel
                className="my-tab-panel"
                activeClass="active-tab"
                onSelect={onSelect}
                tabs={[
                    {
                        name: 'tab1',
                        title: 'Tab 1',
                        className: 'tab-one',
                    },
                    {
                        name: 'tab2',
                        title: 'Tab 2',
                        className: 'tab-two',
                    },
                ]}
            >
                {(tab) => <p>{tab.title}</p>}
            </TabPanel>

            <Card elevation={3} >
                <CardHeader>
                    <Heading lvel={3} >Card Header</Heading>
                </CardHeader>
                <CardBody>
                    <ToggleControl
                        label="Block 1"
                        help={isActive ? 'Active' : 'Inactive'}
                        checked={isActive}
                        onChange={(newValue) => {
                            setIsActive(newValue);
                        }}
                    />
                    <Text>Some text here</Text>
                    
                </CardBody>
                <CardFooter>
                    <Button
                        variant="primary"
                    >
                        Click here
                    </Button>
                </CardFooter>
            </Card>

        </>


    );
}