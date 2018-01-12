import Proposition from './components/proposition/Proposition'
import BasicData from './components/proposition/BasicData'
import Categorization from './components/proposition/Categorization'
import MarketPotential from './components/proposition/MarketPotential'
import TechnicalData from './components/proposition/TechnicalData'
import AuthorsExpense from './components/proposition/AuthorsExpense'
import ExpenseAuthorsExpense from './components/proposition/expenses/AuthorsExpense'
import Print from './components/proposition/Print'
import ExpenseProductionExpense from './components/proposition/expenses/ProductionExpense'
import ProductionExpense from './components/proposition/ProductionExpense'
import MarketingExpense from './components/proposition/MarketingExpense'
import ExpenseMarketingExpense from './components/proposition/expenses/MarketingExpense'
import DistributionExpense from './components/proposition/DistributionExpense'
import ExpenseDistributionExpense from './components/proposition/expenses/DistributionExpense'
import LayoutExpense from './components/proposition/LayoutExpense'
import ExpenseLayoutExpense from './components/proposition/expenses/LayoutExpense'
import Deadline from './components/proposition/Deadline'
import Calculation from './components/proposition/Calculation'
import PropositionStart from './components/proposition/PropositionStart'
import Compare from './components/proposition/expenses/Compare'
import UploadDocument from './components/proposition/UploadDocument'
import Revisions from './components/proposition/Revisions'
import PriceDefinition from './components/proposition/PriceDefinition'
import Warehouse from './components/proposition/Warehouse'
import Marketing from './components/proposition/Marketing'
import Multimedia from './components/proposition/Multimedia'

import EditProfile from './components/hr/EditProfile'

import Tasks from './components/tasks/Tasks'
import TaskEdit from './components/tasks/TaskEdit'
import TaskShow from './components/tasks/TaskShow'
import DepartmentTasks from './components/tasks/DepartmentTasks'
import PropositionList from './components/proposition/PropositionList'

export const routes = [
    { path: '/propositions', component: PropositionList },
    { path: '/proposition/start', component: PropositionStart },
    { path: '/proposition/:id', component: Proposition, name: 'proposition',
        children: [
            { path: 'edit/start', component: PropositionStart, meta: {save : 'start', validate: {id:'int'}, breadcrumb: 'Start', warning: 'proposition/deleteProposition'} },
            { path: 'edit/basic_data', component: BasicData, meta: {save : 'basic_data', validate: {id:'int'}, breadcrumb: 'Basic Data', warning: 'proposition/basic_data/deleteFile'}},
            { path: 'edit/categorization', component: Categorization, meta: {save : 'categorization', validate: {id:'int'}, breadcrumb: 'Categorization'} },
            { path: 'edit/market_potential', component: MarketPotential, meta: {save : 'market_potential', validate: {id:'int'}, breadcrumb: 'Market Potential', warning: 'proposition/market_potential/deleteFile'} },
            { path: 'edit/technical_data', component: TechnicalData, meta: {save : 'technical_data', validate: {id:'int'}, breadcrumb: 'Technical Data'} },
            { path: 'edit/print', component: Print, meta: {save : 'print', validate: {id:'int'}, breadcrumb: 'Print'} },
            { path: 'edit/authors_expense', component: AuthorsExpense, meta: {save : 'authors_expense', validate: {id:'int'}, breadcrumb: 'Authors Expense'} },
            { path: 'edit/production_expense', component: ProductionExpense, meta: {save : 'production_expense', validate: {id:'int'}, breadcrumb: 'Production Expense'} },
            { path: 'edit/marketing_expense', component: MarketingExpense, meta: {save : 'marketing_expense', validate: {id:'int'}, breadcrumb: 'Marketing Expense'} },
            { path: 'edit/distribution_expense', component: DistributionExpense, meta: {save : 'distribution_expense', validate: {id:'int'}, breadcrumb: 'Distribution Expense'} },
            { path: 'edit/layout_expense', component: LayoutExpense, meta: {save : 'layout_expense', validate: {id:'int'}, breadcrumb: 'Layout Expense'} },
            { path: 'edit/deadline', component: Deadline, meta: {save : 'deadline', validate: {id:'int'}, breadcrumb: 'Deadline'} },
            { path: 'edit/calculation', component: Calculation, meta: {save : 'calculation', validate: {id:'int'}, breadcrumb: 'Calculation'} },

            { path: 'preparation/translation', component: UploadDocument, meta: {save: 'files', dir: 'translation', validate: {id:'int'}, breadcrumb: 'Translation', warning: 'proposition/files/deleteFile'} },
            { path: 'preparation/technical_preparation', component: UploadDocument, meta: {save: 'files', dir: 'technical_preparation', validate: {id:'int'}, breadcrumb: 'Technical Preparation', warning: 'proposition/files/deleteFile'} },
            { path: 'preparation/proofreading', component: UploadDocument, meta: {save: 'files', dir: 'proofreading', validate: {id:'int'}, breadcrumb: 'Proofreading', warning: 'proposition/files/deleteFile'} },
            { path: 'preparation/additional_materials', component: UploadDocument, meta: {save: 'files', dir: 'additional_materials', validate: {id:'int'}, breadcrumb: 'Additional Materials', warning: 'proposition/files/deleteFile'} },
            { path: 'preparation/reviews', component: UploadDocument, meta: {save: 'files', dir: 'reviews', validate: {id:'int'}, breadcrumb: 'Reviews', warning: 'proposition/files/deleteFile'} },
            { path: 'preparation/lecture', component: UploadDocument, meta: {save: 'files', dir: 'lecture', validate: {id:'int'}, breadcrumb: 'Lecture', warning: 'proposition/files/deleteFile'} },
            { path: 'preparation/technical_correction', component: UploadDocument, meta: {save: 'files', dir: 'technical_correction', validate: {id:'int'}, breadcrumb: 'Technical Correction', warning: 'proposition/files/deleteFile'} },
            { path: 'preparation/final_review', component: UploadDocument, meta: {save: 'files', dir: 'final_review', validate: {id:'int'}, breadcrumb: 'Final Review', warning: 'proposition/files/deleteFile'} },

            { path: 'expenses/authors_expense', component: ExpenseAuthorsExpense, meta: {save : 'authors_expense', validate: {id:'int'}, breadcrumb: 'Authors Expense', 'type': 'expense'} },
            { path: 'expenses/production_expense', component: ExpenseProductionExpense, meta: {save:'production_expense',validate: {id:'int'}, breadcrumb: 'Production Expense', 'type': 'expense'} },
            { path: 'expenses/marketing_expense', component: ExpenseMarketingExpense, meta: { save: 'marketing_expense',validate: {id:'int'}, breadcrumb: 'Marketing Expense', 'type': 'expense' } },
            { path: 'expenses/distribution_expense', component: ExpenseDistributionExpense, meta: {save : 'distribution_expense', validate: {id:'int'}, breadcrumb: 'Distribution Expense', 'type': 'expense'} },
            { path: 'expenses/layout_expense', component: ExpenseLayoutExpense, meta: {save : 'layout_expense',validate: {id:'int'}, breadcrumb: 'Layout Expense', 'type': 'expense'} },
            { path: 'expenses/compare', component: Compare, meta: {save: 'compare', validate: {id:'int'}, breadcrumb: 'Compare'} },

            { path: 'design/cover_design', component: UploadDocument, meta: {save: 'files', dir: 'cover_design',validate: {id:'int'}, breadcrumb: 'Cover Design', warning: 'proposition/files/deleteFile'} },
            { path: 'design/layout_design', component: UploadDocument, meta: {save: 'files', dir: 'layout_design',validate: {id:'int'}, breadcrumb: 'Layout Design', warning: 'proposition/files/deleteFile'} },

            { path: 'layout/first_block_layout', component: UploadDocument, meta: {save: 'files', dir: 'first_block_layout',validate: {id:'int'}, breadcrumb: 'First Block Layout', warning: 'proposition/files/deleteFile'} },
            { path: 'layout/cover', component: UploadDocument, meta: {save: 'files', dir: 'cover',validate: {id:'int'}, breadcrumb: 'Cover', warning: 'proposition/files/deleteFile'} },
            { path: 'layout/layout', component: UploadDocument, meta: {save: 'files', dir: 'layout',validate: {id:'int'}, breadcrumb: 'Layout', warning: 'proposition/files/deleteFile'} },
            { path: 'layout/first_revision', component: UploadDocument, meta: {save: 'files', dir: 'first_revision',validate: {id:'int'}, breadcrumb: 'First Revision', warning: 'proposition/files/deleteFile'} },
            { path: 'layout/correction', component: UploadDocument, meta: {save: 'files', dir: 'correction',validate: {id:'int'}, breadcrumb: 'Correction', warning: 'proposition/files/deleteFile'} },
            { path: 'layout/correction_input', component: UploadDocument, meta: {save: 'files', dir: 'correction_input',validate: {id:'int'}, breadcrumb: 'Correction Input', warning: 'proposition/files/deleteFile'} },
            { path: 'layout/revisions', component: Revisions, meta: {save: 'revisions', validate: {id:'int'}, breadcrumb: 'Revisions'} },

            { path: 'final_price/price_definition', component: PriceDefinition, meta: {save: 'price_definition', validate: {id:'int'}, breadcrumb: 'Price Definition'} },

            { path: 'prepress/print_proof', component: UploadDocument, meta: {save: 'files', dir: 'print_proof',validate: {id:'int'}, breadcrumb: 'Print Proof', warning: 'proposition/files/deleteFile'} },
            { path: 'prepress/print_proof_correction', component: UploadDocument, meta: {save: 'files', dir: 'print_proof_correction',validate: {id:'int'}, breadcrumb: 'Print Proof Correction', warning: 'proposition/files/deleteFile'} },
            { path: 'prepress/print', component: UploadDocument, meta: {save: 'files', dir: 'print',validate: {id:'int'}, breadcrumb: 'Print', warning: 'proposition/files/deleteFile'} },
            { path: 'prepress/warehouse', component: Warehouse,meta: {save: 'warehouse', validate: {id:'int'}, breadcrumb: 'Warehouse'} },

            { path: 'additionals/multimedia', component: Multimedia,meta: {save: 'files', validate: {id:'int'}, breadcrumb: 'Multimedia'} },
            { path: 'additionals/marketing', component: Marketing,meta: {save: 'files', validate: {id:'int'}, breadcrumb: 'Marketing'} },

        ]
    },

    { path: '/tasks', component: Tasks },
    { path: '/task/edit/:id(\\d+)?', component: TaskEdit },
    { path: '/task/show/:id(\\d+)', component: TaskShow },
    { path: '/tasks/department/:id(\\d+)', component: DepartmentTasks },

    { path: '/human_resources/employee/new', component: EditProfile},
    { path: '/human_resources/employee/:id(\\d+)/edit', component: EditProfile},
    { path: '/human_resources/employee/:id(\\d+)', component: EditProfile}
];
