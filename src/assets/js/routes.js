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


import Tasks from './components/tasks/Tasks'
import TaskEdit from './components/tasks/TaskEdit'
import TaskShow from './components/tasks/TaskShow'

export const routes = [
    { path: '/proposition/start', component: PropositionStart },
    { path: '/proposition/:id', component: Proposition,
        children: [
            { path: 'edit/start', component: PropositionStart, meta: {save : 'start', validate: {id:'int'}} },
            { path: 'edit/basic_data', component: BasicData, meta: {save : 'basic_data', validate: {id:'int'}}},
            { path: 'edit/categorization', component: Categorization, meta: {save : 'categorization', validate: {id:'int'}} },
            { path: 'edit/market_potential', component: MarketPotential, meta: {save : 'market_potential', validate: {id:'int'}} },
            { path: 'edit/technical_data', component: TechnicalData, meta: {save : 'technical_data', validate: {id:'int'}} },
            { path: 'edit/print', component: Print, meta: {save : 'print', validate: {id:'int'}} },
            { path: 'edit/authors_expense', component: AuthorsExpense, meta: {save : 'authors_expense', validate: {id:'int'}} },
            { path: 'edit/production_expense', component: ProductionExpense, meta: {save : 'production_expense', validate: {id:'int'}} },
            { path: 'edit/marketing_expense', component: MarketingExpense, meta: {save : 'marketing_expense', validate: {id:'int'}} },
            { path: 'edit/distribution_expense', component: DistributionExpense, meta: {save : 'distribution_expense', validate: {id:'int'}} },
            { path: 'edit/layout_expense', component: LayoutExpense, meta: {save : 'layout_expense', validate: {id:'int'}} },
            { path: 'edit/deadline', component: Deadline, meta: {save : 'deadline', validate: {id:'int'}} },
            { path: 'edit/calculation', component: Calculation, meta: {save : 'calculation', validate: {id:'int'}} },

            { path: 'preparation/translation', component: UploadDocument, meta: {dir: 'translation', validate: {id:'int'}} },
            { path: 'preparation/technical_preparation', component: UploadDocument, meta: {dir: 'technical_preparation', validate: {id:'int'}} },
            { path: 'preparation/proofreading', component: UploadDocument, meta: {dir: 'proofreading', validate: {id:'int'}} },
            { path: 'preparation/additional_materials', component: UploadDocument, meta: {dir: 'additional_materials', validate: {id:'int'}} },
            { path: 'preparation/reviews', component: UploadDocument, meta: {dir: 'reviews', validate: {id:'int'}} },
            { path: 'preparation/lecture', component: UploadDocument, meta: {dir: 'lecture', validate: {id:'int'}} },
            { path: 'preparation/technical_correction', component: UploadDocument, meta: {dir: 'technical_correction', validate: {id:'int'}} },
            { path: 'preparation/final_review', component: UploadDocument, meta: {dir: 'final_review', validate: {id:'int'}} },

            { path: 'expenses/authors_expense', component: ExpenseAuthorsExpense, meta: {save : 'authors_expense', validate: {id:'int'}} },
            { path: 'expenses/production_expense', component: ExpenseProductionExpense, meta: {save:'production_expense',validate: {id:'int'}} },
            { path: 'expenses/marketing_expense', component: ExpenseMarketingExpense, meta: { save: 'marketing_expense',validate: {id:'int'} } },
            { path: 'expenses/distribution_expense', component: ExpenseDistributionExpense, meta: {save : 'distribution_expense', validate: {id:'int'}} },
            { path: 'expenses/layout_expense', component: ExpenseLayoutExpense, meta: {save : 'layout_expense',validate: {id:'int'}} },
            { path: 'expenses/compare', component: Compare, meta: {validate: {id:'int'}} },

            { path: 'design/cover_design', component: UploadDocument, meta: {dir: 'cover_design',validate: {id:'int'}} },
            { path: 'design/layout_design', component: UploadDocument, meta: {dir: 'layout_design',validate: {id:'int'}} },

            { path: 'layout/first_block_layout', component: UploadDocument, meta: {dir: 'first_block_layout',validate: {id:'int'}} },
            { path: 'layout/cover', component: UploadDocument, meta: {dir: 'cover',validate: {id:'int'}} },
            { path: 'layout/layout', component: UploadDocument, meta: {dir: 'layout',validate: {id:'int'}} },
            { path: 'layout/first_revision', component: UploadDocument, meta: {dir: 'first_revision',validate: {id:'int'}} },
            { path: 'layout/correction', component: UploadDocument, meta: {dir: 'correction',validate: {id:'int'}} },
            { path: 'layout/correction_input', component: UploadDocument, meta: {dir: 'correction_input',validate: {id:'int'}} },
            { path: 'layout/revisions', component: Revisions, meta: {validate: {id:'int'}} },

            { path: 'final_price/price_definition', component: PriceDefinition, meta: {validate: {id:'int'}} },

            { path: 'prepress/print_proof', component: UploadDocument, meta: {dir: 'print_proof',validate: {id:'int'}} },
            { path: 'prepress/print_proof_correction', component: UploadDocument, meta: {dir: 'print_proof_correction',validate: {id:'int'}} },
            { path: 'prepress/print', component: UploadDocument, meta: {dir: 'print',validate: {id:'int'}} },
            { path: 'prepress/warehouse', component: Warehouse,meta: {validate: {id:'int'}} },

            { path: 'additionals/multimedia', component: Multimedia,meta: {validate: {id:'int'}} },
            { path: 'additionals/marketing', component: Marketing,meta: {validate: {id:'int'}} },

        ]
    },

    { path: '/tasks', component: Tasks },
    { path: '/task/edit/:id(\\d+)?', component: TaskEdit },
    { path: '/task/show/:id(\\d+)', component: TaskShow }
];
