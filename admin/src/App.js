import React from 'react';
import { HydraAdmin } from '@api-platform/admin';
import { Filter, ReferenceInput, SelectInput, TextInput, List } from 'react-admin';
import parseHydraDocumentation from '@api-platform/api-doc-parser/lib/hydra/parseHydraDocumentation';

const entrypoint = 'http://localhost:8000/api';

const myApiDocumentationParser = entrypoint => parseHydraDocumentation(entrypoint);
const PostFilter = (props) => (
    <Filter {...props}>
        <TextInput label="Search" source="q" alwaysOn />
        <ReferenceInput label="Child" source="childId" reference="children" allowEmpty>
            <SelectInput optionText="name" />
        </ReferenceInput>
    </Filter>
);

export const PostList = (props) => (
    <List {...props} filters={<PostFilter />}>
    </List>
);


export default (props) => <HydraAdmin apiDocumentationParser={myApiDocumentationParser} entrypoint={entrypoint}/>;